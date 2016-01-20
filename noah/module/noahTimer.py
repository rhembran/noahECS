
from module import app
from classes import clockers

from json import dumps
from flask import Flask, make_response

from module import app
# have to integrate with redis /mini SQL database
global clockerThreadList
clockerThreadList=[]

@app.route('/createNewClock')
def createNewClock():
    newClock = clockers.clockers("relay1",2,5,5)
    clockerThreadList.append(newClock)
    newClock.run("ON")

    return "Clock initialized"

@app.route('/stopClock')
def stopClock():
    return "Clock stopped"

@app.route('/killClock')
def killClock():
    return "Clock killed"

@app.route('/adjustClock')
def adjustClock():
    return "Clock adjusted"
