from flask import Flask
from flask.ext.cors import CORS, cross_origin

app = Flask(__name__)
cors = CORS(app)
app.config['CORS_HEADERS'] = 'Content-Type'

from module import noahADC
from module import noahGPIO
from module import noahTimer

noahGPIO.setupGPIO_Outputs()
