<h4>Clocked Interval Control Options</h4>
<form role="update">
    <div class="form-group row">
      <div class = "col-sm-4">
        <input type="hidden" ng-model = "portFormData[$index]" ng-init="portFormData[$index].portLabel = port.portLabel" class="form-control">
        <input type="hidden" ng-model="portFormData[$index].portCtrlType" ng-init="portFormData[$index].portCtrlType = port.portFunction"  class="form-control" >
        <input type="text" placeholder="Description" ng-disabled = "portFormData[$index].portCtrlType != 'interval'" class="form-control"ng-model="portFormData[$index].portDescription" ng-init="portFormData[$index].portDescription = port.portDescription">
      </div>
    </div>
    <div class ="form-group form-inline row">
      <div class = "col-sm-4">
      <label  class="control-label ">ON Interval</label>
      <br>
      <select  class="form-control form-inline" ng-disabled = "portFormData[$index].portCtrlType != 'interval'" ng-model="portFormData[$index].onHours">
        <option ng-repeat="n in range(0,24)">{{n}}</option>
      </select>Hrs
      <select  class="form-control form-inline" ng-disabled = "portFormData[$index].portCtrlType != 'interval'" ng-model="portFormData[$index].onMinutes">
        <option ng-repeat="n in range(0,60)">{{n}}</option>
      </select>Min
      <select  class="form-control form-inline" ng-disabled = "portFormData[$index].portCtrlType != 'interval'" ng-model="portFormData[$index].onSeconds">
        <option ng-repeat="n in range(0,60)">{{n}}</option>
      </select>Sec
      </div>
    </div>
    <div class ="form-group form-inline row">
      <div class = "col-sm-4">
      <label  class="control-label ">OFF Interval</label>
      <br>
      <select  class="form-control form-inline" ng-disabled = "portFormData[$index].portCtrlType != 'interval'" ng-model="portFormData[$index].offHours">
        <option ng-repeat="n in range(0,24)">{{n}}</option>
      </select>Hrs
      <select  class="form-control form-inline"  ng-disabled = "portFormData[$index].portCtrlType != 'interval'" ng-model="portFormData[$index].offMinutes">
        <option ng-repeat="n in range(0,60)">{{n}}</option>
      </select>Min
      <select  class="form-control form-inline" ng-disabled = "portFormData[$index].portCtrlType != 'interval'" ng-model="portFormData[$index].offSeconds">
        <option ng-repeat="n in range(0,60)">{{n}}</option>
      </select>Sec
      </div>
    </div>
    <div class = "form-group row ">
      <div class = "col-sm-4">
      <button class="btn btn-default" type="button" ng-click = " adjustPortFormToInterval($index)">Unlatch</button>
      <button class="btn btn-default" type="button" ng-disabled = "portFormData[$index].portCtrlType != 'interval'">Save</button>
      <br><br>
      <p>
        <span id="helpBlock" class="help-block">*If the output is being used by manual or sensors, you need to unlatch it for manual control.
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
