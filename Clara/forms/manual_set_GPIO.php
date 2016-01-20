
<h4>Manual Control Options</h4>
<form role="form"  ng-submit="processPortForm($index)" >
    <div class="form-group row">
        <div class = "col-sm-4">
          <input type="hidden"  ng-model="portFormData[$index].portLabel" ng-init="portFormData[$index].portLabel = port.portLabel" class="form-control"></input>
          <input type="hidden"  ng-model="portFormData[$index].portLabel" ng-init="portFormData[$index].portLabel = port.portLabel" class="form-control"></input>
          <input type="hidden" ng-model="portFormData[$index].portCtrlType" ng-init="portFormData[$index].portCtrlType = port.portFunction"  class="form-control" >
          <input type="text"  ng-disabled = "portFormData[$index].portCtrlType != 'manual'" placeholder="Description" class="form-control" ng-model="portFormData[$index].portDescription" ng-init="portFormData[$index].portDescription = port.portDescription">
        </div>
    </div>
    <div class ="form-group row" >
      <div class = "col-sm-2">
      <label  class="control-label ">Output State</label>
      <select  class="form-control form-inline" ng-disabled = "portFormData[$index].portCtrlType != 'manual'" ng-model="portFormData[$index].portState" ng-init="portFormData.portState='ON'">
          <option value = "ON">SWITCH ON</option>
          <option value = "OFF">SWITCH OFF</option>
      </select>
      </div>
    </div>
    <div class = "form-group row ">
      <div class = "col-sm-4">
      <button class="btn btn-default" type="button" ng-click = " adjustPortFormToManual($index)">Unlatch</button>
      <button class="btn btn-default" type="submit" ng-disabled = "portFormData[$index].portCtrlType != 'manual'">Save</button>
      <br><br>
      <p>
        <span id="helpBlock" class="help-block">*If the output is being used by timers or sensors, you need to unlatch it for manual control.
        </span>
      </p>
      </div>
  </div>
</form>
<div>
<div>
  <pre>
    {{portFormData[$index]}}
  </pre>
</div>
