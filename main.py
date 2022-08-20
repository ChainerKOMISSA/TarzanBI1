import pymongo
import spacy
from app import *
import json
from pymongo import MongoClient
import mysql.connector
from mysql.connector import Error
import numpy as np


token = "EAAPSc0PwSO8BAJ8YZCZAooq7PkoMTVdgy5rWXt4C4pdAEQxQI3JZCZBrmZAvyYcdrIZBay8ZCZB13ebZBXpSmgtrPI7goJ2gyzusysVDRB4eH9IMztfY2hPDP7qJJaMZAtqhUMZCH1KNEvehyLlyFfPIg6yZCocc0M58KXDbFedtEjULXQZDZD"
me = "https://graph.facebook.com/v14.0/access_token="+token

#dbconnection
def get_database():
    try:
        connection = "mongodb://localhost:27017"
        client = MongoClient(connection)
        db = client["Data"]
        #print("Connexion réussie")
    except :
        print("Connexion à MongoDB impossible")
    return db




#natural language processing implementation
def meaning(word):
    nlp = spacy.load('fr_core_news_sm')
    doc = nlp(word)
    """for chunk in doc.noun_chunks:
        print(chunk.text)"""
    for ent in doc.ents:
        print(ent.text, ent.label_)
    return ent.label_




#liste des produits les plus recherchés de la base -> renvoie un dictionnaire de produit avec leur nombre
def produits():
    db = get_database()
    mycollection = db["Commandes"]
    try:
        #query = mycollection.find_one({"Description": "Iphone"})
        query = mycollection.distinct('Description')
        print(query)
    except:
        print("Invalide")



def get_mysqldb():
    try:
        conn = mysql.connector.connect(host="localhost",
                                    user="root",
                                    password = "",
                                    database = "data")
        return conn
    except Error as e:
        print("Erreur:", e)



#retourner les villes avec le nombre de ventes de ce produit
#en x on aura les villes et en y les nombres
def statistiquesville():
    db = get_mysqldb()
    mycursor = db.cursor()
    values = getvalues()
    prod = values["produit"]
    query = ("""SELECT SUM(Quantity), City
             FROM commandes
             WHERE Description = '{}'
             GROUP BY City;""".format(prod))
    mycursor.execute(query)
    result = mycursor.fetchall()
    return result




#retourner les mois avec le nombre de ventes de ce produit
#en x on aura les mois et en y les nombres
def statistiquesmois():
    db = get_mysqldb()
    mycursor = db.cursor()
    values = getstats()
    produit = values["produit"]
    mois = values["mois"]
    if mois == "Janvier":
        month = "%/01/%"
    elif mois == "Février":
        month = "%/02/%"
    elif mois == "Mars":
        month = "%/03/%"
    elif mois == "Avril":
        month = "%/04/%"
    elif mois == "Mai":
        month = "%/05/%"
    elif mois == "Juin":
        month = "%/06/%"
    elif mois == "Juillet":
        month = "%/07/%"
    query = ("""SELECT SUM(Quantity), InvoiceDate 
            FROM commandes 
            WHERE Description = '{}'
            AND InvoiceDate LIKE '{}'
            GROUP BY InvoiceDate;""".format(produit, mois))
    mycursor.execute(query)
    result = mycursor.fetchall()
    print(result)
    return result






if __name__ == "__main__":
    statistiquesmois()
