from flask import Flask, request, flash, url_for, session, redirect
from main import *


app = Flask(__name__, template_folder='interface')


#routes
@app.route('/', methods=['GET', 'POST'])
def statsparville():
    return statistiquesville()


@app.route('/stats', methods=['GET', 'POST'])
def statsparmois():
    return statistiquesmois()




#fonctions
def getvalues():
    if request.method == 'POST':
        doc = request.get_json()
        produit = doc['produit']
        ville = doc['ville']
        val = {"produit": produit, "ville": ville}
        return val


def sendvalues():
    if request.method == 'GET':
        lis = statistiquesville()
        listenbre = request.get_json(lis)
        nbre = listenbre['SUM(Quantity)']
        ville = listenbre['City']
        rep = {"nbre" : nbre, "ville":ville}
        return rep






def getstats():
    if request.method== 'POST':
        doc = request.get_json()
        produit = doc['produit']
        mois = doc['mois']
        liste = {"produit": produit, "mois": mois}
    return liste








if __name__ == '__main__':
    app.run(host='127.0.0.1', port=5000, debug=True)