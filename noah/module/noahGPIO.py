from module import app
from json import dumps
from flask import Flask, request, make_response, url_for, json
from flask.ext.cors import CORS, cross_origin

import RPi.GPIO as GPIO
import os

relayDictionary={
    'relay1': 2,
    'relay2': 3,
    'relay3': 4,
    'relay4': 5,
    'relay5': 6,
    'relay6': 12,
    'relay7': 13,
    'relay8': 17,
    'relay9': 18,
    'relay10': 19,
    'relay11': 20,
    'relay12': 21,
    'relay13': 22,
    'relay14': 23,
    'relay15': 24,
    'relay16': 27 }

def setupGPIO_Outputs():
    print GPIO.VERSION

    GPIO.setmode(GPIO.BCM)
    for num in range (1,16):
        label = "relay"+str(num)
        GPIO.setup(relayDictionary[label],GPIO.OUT)
    return

# This is the manual switch on/switch off mode for the relay switches
# controlling valves, pumps, foggers etc.

@app.route('/getTestPortDetails')
@cross_origin(origin='*',headers=['Content-Type','Authorization'])
def getTestPortSettings():

    SITE_ROOT = os.path.realpath(os.path.dirname(__file__))
    json_url = os.path.join(SITE_ROOT, "tempJSON", "testPort.JSON")
    response = json.load(open(json_url))
    print response
    return make_response(dumps(response))

@app.route('/setPortOutputs', methods=['POST'])
@cross_origin(origin='*',headers=['Content-Type','Authorization'])
def affirmGPIO_HardPoint():

    portLabel = request.form['portLabel']
    portCtrlType = request.form['portCtrlType']
    portDescription = request.form['portDescription']
    requestState=request.form['portState']

    if requestState == 'OFF' :
        GPIO.output(relayDictionary[portLabel],False)
    else:
        GPIO.output(relayDictionary[portLabel],True)

    response = "{\"portLabel\":\""+portLabel+"\",\"portDescription\":\""+portDescription+"\"}"

    return response

def writePortSetting_To_Dbase(portLabel,portDescription,portCtrlType,portState):

    return


@app.route('/setClockedOutputs', methods=['POST'])
@cross_origin(origin='*',headers=['Content-Type','Authorization'])
def affirmGPIO_ClockPoint():

    portLabel=request.form['portLabel']
    offStateDuration=request.form['offStateDuration']
    onStateDuration=request.form['onStateDuration']

    # Set Timer Variables.
    # Recall Timer threads.
