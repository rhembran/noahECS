<div ng-controller="gpioController">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>RELAY</th>
        <th>DESCRIPTION</th>
        <th>FUNCTION</th>
      </tr>
    </thead>

    <tbody>
      <tr ng-repeat-start="port in portsList">
            <td><a href="#" ng-click="isCollapsed = !isCollapsed">{{port.portLabel}}</a></td>
            <td>{{port.portDescription}}</td>
            <td>{{port.portFunction}}</td>
          </tr>
          <tr collapse="isCollapsed" ng-repeat-end="">
            <td colspan="3">
              <h3>Settings for {{port.portLabel}}</h3>
                  <div class="btn-group" data-toggle="buttons">
                      <label class =" btn btn-default " ng-click="showOutputOptions('MANUAL')" >
                        <input type="radio" name="manual_select" />Manual Output
                      </label>
                      <label class =" btn btn-default" ng-click="showOutputOptions('INTERVAL')">
                        <input type="radio" name="interval_select">Intervals
                      </label>
                      <label class =" btn btn-default" ng-click=" showOutputOptions('TEMP');">
                        <input type="radio" name="temphum_select" >Temperature
                      </label>
                      <label class =" btn btn-default" ng-click=" showOutputOptions('HUMIDITY');">
                        <input type="radio" name="temphum_select" >Humidity
                      </label>
                  </div>

                  <div collapse="collapse_ManualDiv" ng-include src="'forms/manual_set_GPIO.php'"></div>
                  <div collapse="collapse_IntervalDiv" ng-include src="'forms/interval_set_GPIO.php'"></div>
                  <div collapse="collapse_TempDiv" ng-include src="'forms/temperature_set_GPIO.php'"></div>
                  <div collapse="collapse_HumDiv" ng-include src="'forms/humidity_set_GPIO.php'"></div>
                </form>
            </td>

          </tr>
    </tbody>
  </table>
</div>
