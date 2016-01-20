import time
import threading
import RPi.GPIO as GPIO

class clockers:
  portlabel=""
  pTimerIntervalOn  = 0
  pTimerIntervalOff = 0

  def __init__(self,portName,portValue_,onTime, offTime):
    print "Created a new Clock instance for ",portName
    self.portlabel= portName

    print "Initializing as GPIO Output ",portValue_
    self.portValue =portValue_
    GPIO.setup(self.portValue,GPIO.OUT)

    print "Initializing ON interval ",onTime
    self.pTimerIntervalOn = onTime

    print "Initializing OFF interval", offTime
    self.pTimerIntervalOff = offTime

    return

  def getPortValue(self):
    return self.portValue

  def getPortLabel(self):
    return self.portLabel

  def setIntervalOn(self,newTime):
    self.pTimerIntervalOn = newTime
    return

  def getIntervalOn(self):
    return self.pTimerIntervalOn

  def setIntervalOff(self,newTime):
    self.pTimerIntervalOff = newTime
    return

  def getIntervalOff(self):
    return self.pTimerIntervalOn

  def runnable(self,On_Off):
      self.state = On_Off
      while True:
            if self.state == "ON":
                print "Switched ON GPIO ... ", self.portlabel
                GPIO.output(self.portValue, True)
                time.sleep(self.pTimerIntervalOn)
                self.state = "OFF"
            else:
                print "Switched OFF GPIO ... ", self.portlabel
                GPIO.output(self.portValue, False)
                time.sleep(self.pTimerIntervalOff)
                self.state = "ON"
  def run(self,On_Off):
      print "Running Clocker Thread ... "
      self.clock = threading.Thread(target = self.runnable,args =[On_Off])
      self.clock.start()
      #self.clock.join()


  def cancelOperate(self):
      self.clock.cancel()
