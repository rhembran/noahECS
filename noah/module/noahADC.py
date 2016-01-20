##!/usr/bin/python

import spidev

from json import dumps
from flask import Flask, make_response
from flask.ext.cors import CORS, cross_origin

from module import app




#Open SPI bus
spi = spidev.SpiDev()
spi.open(0,0)


#Function to read SPI data from AD7490 chip
#Channel must be an integer 0-16

channelDictionary={
    'zone1': 0x00,
    'zone2': 0x01,
    'zone3': 0x02,
    'zone4': 0x03,
    'zone5': 0x04,
    'zone6': 0x05,
    'zone7': 0x06,
    'zone8': 0x07,
    'zone9': 0x08,
    'zone10': 0x09,
    'zone11': 0x0A,
    'zone12': 0x0B,
    'zone13': 0x0C,
    'zone14': 0x0D,
    'zone15': 0x0E,
    'zone16': 0x0F,
    'zone17': 0x0F }



def buildCMD(channel):

    hexAMan = 0x83;
    bitAddress   = channelDictionary[channel]
    bitAddress <<= 2
    hexAMan |= bitAddress
    istartByte  = hexAMan
    iEndByte    = 0x10
    return [istartByte, iEndByte]

def processData(data):
    pValue = ((data[0]&0x0F) << 8 )
    pValue |= data[1]
    return pValue

def ReadChannel(channel):

    adc = spi.xfer2(buildCMD(channel))
    return processData(adc)


def adcCollect():

    adcArray = [0x00] * 16

    val = ReadChannel('zone1')

    for num in range(2,17):
        label = "zone"+str(num)
        val = ReadChannel(label)
        adcArray[num - 1] = val

    return adcArray




@app.route('/readADC')
@cross_origin()
def http_GET_ADCValues():
    channelDict={}
    val = adcCollect()
    for num in range(1,16):
        name = "channel"+str(num)
        channelDict[name] = val[num-1]
    return  make_response(dumps(channelDict))
