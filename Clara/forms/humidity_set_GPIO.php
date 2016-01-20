<h4>Humidity Control Options</h4>
<form role="update">
    <div class="form-group row">
      <div class = "col-sm-4"
        <input type="hidden" ng-model = "portFormData[$index]" ng-init="portFormData[$index].portLabel = port.portLabel" class="form-control">
        <input type="hidden" ng-model="portFormData[$index].portCtrlType" ng-init="portFormData[$index].portCtrlType = port.portFunction" class="form-control" >
        <input type="text" size="35" ng-model="portFormData[$index].portDescription" placeholder="Description" class="form-control" ng-init="portFormData[$index].portCtrlType = port.portDescription"
               ng-disabled = "portFormData[$index].portCtrlType != 'humidity'">
      </div>
    </div>
    <div class ="form-group form-inline row">
      <div class = "col-sm-4">
      <label  class="control-label ">Humidity Level to Switch On</label>
      <br>
      <select  class="form-control" ng-model ="portFormData[$index].max_or_min_Humidity_SwitchOn" ng-disabled = "portFormData[$index].portCtrlType != 'humidity'">
          <option value = "MAX">MAXIMUM</option>
          <option value = "MIN">MINIMUM</option>
      </select>
      <br><br>
      <select  class="form-control form-inline" ng-model ="portFormData[$index].humidityLevel_SwitchOn" ng-disabled = "portFormData[$index].portCtrlType != 'humidity'">
        <option ng-repeat="n in range(0,100)">{{n}}</option>
      </select>%

      </div>
    </div>
    <div class ="form-group form-inline row">
      <div class = "col-sm-4">
      <label  class="control-label ">Humidity Level to Switch Off</label>
      <br><br>
      <select  ng-model ="portFormData[$index].max_or_min_Humidity_SwitchOff" class="form-control " ng-disabled = "portFormData[$index].portCtrlType != 'humidity'">
          <option value = "MAX">MAXIMUM</option>
          <option value = "MIN">MINIMUM</option>
      </select>
      <br><br>
      <select  class="form-control form-inline" ng-model ="portFormData[$index].humidityLevel_SwitchOff" ng-disabled = "portFormData[$index].portCtrlType != 'humidity'" >
        <option ng-repeat="n in range(0,100)">{{n}}</option>
      </select>%
      </div>
    </div>
    <div class = "form-group row ">
      <div class = "col-sm-4">
      <button class="btn btn-default" type="button" ng-click = "adjustPortFormToHumidity($index)">Unlatch</button>
      <button class="btn btn-default" type="button" ng-disabled = "portFormData[$index].portCtrlType != 'humidity'">Save</button>
      <br><br>
      <p>
        <span id="helpBlock" class="help-block">*If the output is being used by manual or timers, you need to unlatch it for manual control.
        </span>
      </p>
      </div>
    </div>
</form>
<div>
<pre>
    {{ portFormData[$index] }}
</pre>
</div>
