import pymongo
import spacy
from flask import jsonify
from spacy import displacy
from collections import Counter
from nltk.tokenize import sent_tokenize, word_tokenize
import requests
from app import *
import json
from pymongo import MongoClient


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




#retourner les villes avec le nombre de ventes de ce produit
#en x on aura les villes et en y les nombres
def statistiquesville():
    db = get_database()
    mycollection = db["Commandes"]
    values = getvalues()
    produit = values["produit"]
    ville = values["ville"]
    mongoquery = ""
    print()
    return mongoquery




#retourner les mois avec le nombre de ventes de ce produit
#en x on aura les mois et en y les nombres
def statistiquesmois():
    db = get_database()
    mycollection = db["Commandes"]
    values = getstats()
    produit = values["produit"]
    mois = values["mois"]
    mongoquery = ""
    print()
    return mongoquery




if __name__ == "__main__":
    produits()
