<h4>Temperature Control Options</h4>
<form role="update">
    <div class="form-group row">
      <div class = "col-sm-4"
        <input type="text" size="35" placeholder="Description" class="form-control" value="{{port.portDescription}}">
      </div>
    </div>
    <div class ="form-group form-inline row">
      <div class = "col-sm-4">
      <label  class="control-label ">Max Limit of Temperature</label>

      <br><br>
      <select  class="form-control form-inline" ng-disabled = "portFormData[$index].portCtrlType != 'temperature'"
               ng-model="portFormData[$index].max_Temperature_Limit">
        <option ng-repeat="n in range(0,100)">{{n}}</option>
      </select> Celsius
      </div>
    </div>
    <div class ="form-group form-inline row">
      <div class = "col-sm-4">
      <label  class="control-label ">Device action upon hitting Max Limit</label>
      <select  class="form-control form-inline" ng-disabled = "portFormData[$index].portCtrlType != 'temperature'"
              ng-model="portFormData[$index].deviceState_MaxTempLevel">
          <option value = "ON">SWITCH ON</option>
          <option value = "OFF">SWITCH OFF</option>
      </select>
      </div>
    </div>
    <div class ="form-group form-inline row">
      <div class = "col-sm-4">
      <label  class="control-label ">Minimum Limit Of Temperature Level  </label>
      <br><br>
      <select  class="form-control form-inline" ng-model="portFormData[$index].min_Temperature_Limit">
        <option ng-repeat="n in range(0,100)">{{n}}</option>
      </select> Celsius
      </div>
    </div>
    <div class ="form-group form-inline row">
    <div class = "col-sm-4">
    <label  class="control-label ">Device action upon hitting Min Limit</label>
    <select  class="form-control form-inline" ng-disabled = "portFormData[$index].portCtrlType != 'temperature'"
            ng-model="portFormData[$index].deviceState_MinTempLevel">
        <option value = "ON">SWITCH ON</option>
        <option value = "OFF">SWITCH OFF</option>
    </select>
    </div>
    </div>
    <div class = "form-group row ">
      <div class = "col-sm-4">
      <button class="btn btn-default" type="button" ng-click="adjustPortFormToTemperature($index)">Unlatch</button>
      <button class="btn btn-default" type="button" ng-disabled = "portFormData[$index].portCtrlType != 'temperature'">Save</button>
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
