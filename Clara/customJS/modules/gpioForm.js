var gpioApp = angular.module('gpioForm',['ui.bootstrap']);

gpioApp.config(['$httpProvider', function($httpProvider) {
        $httpProvider.defaults.useXDomain = true;
        delete $httpProvider.defaults.headers.common['X-Requested-With'];
    }
]);

gpioApp.controller('gpioController',function($http,$scope){
 //dummy data under portsList
 // Either catered by noah's backend or a separate php process
  $scope.isCollapsed = true;
  $scope.collapse_ManualDiv   =true;
  $scope.collapse_IntervalDiv =true;
  $scope.collapse_TempDiv  =true;
  $scope.collapse_HumDiv  =true;



  $http.get('http://192.168.15.109:5000/getTestPortDetails').then(function(response) {
    $scope.portsList = response.data;
  });

   $scope.showOutputOptions = function(flag){
     switch(flag){
       case 'MANUAL'  :
                        $scope.collapse_ManualDiv   =false;
                        $scope.collapse_IntervalDiv =true;
                        $scope.collapse_TempDiv  =true;
                        $scope.collapse_HumDiv   =true;
                      break;
       case 'INTERVAL':
                        $scope.collapse_ManualDiv   =true;
                        $scope.collapse_IntervalDiv =false;
                        $scope.collapse_TempDiv  =true;
                        $scope.collapse_HumDiv   =true;
                      break;
       case 'TEMP':
                        $scope.collapse_ManualDiv   =true;
                        $scope.collapse_IntervalDiv =true;
                        $scope.collapse_TempDiv  =false;
                        $scope.collapse_HumDiv   =true;

                      break;
      case 'HUMIDITY':
                        $scope.collapse_ManualDiv   =true;
                        $scope.collapse_IntervalDiv =true;
                        $scope.collapse_TempDiv  =true;
                        $scope.collapse_HumDiv   =false;

                      break;
       default:
                      break;
     }
     return;
   };
   /*
    *
    */
   $scope.range = function(min, max, step) {
    step = step || 1;
    var input = [];
    for (var i = min; i <= max; i += step) {
        input.push(i);
    }
    return input;
  };
  /*
   *
   */

   $scope.portFormData  = {};
  /*
   * AJAX process for Manual Port Upload
   */
  $scope.processPortForm=function(t_index){
        $http({
                method  : 'POST',
                url     : 'http://192.168.15.109:5000/setPortOutputs',
                data    : $.param($scope.portFormData[t_index]),  // pass in data as strings
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
              })
              .success(function(data) {
                                        console.log(data);
                                      })
              .error(function (error, status){
                                $scope.data.error = { message: error, status: status};
                                console.log($scope.data.error.status);
              });
  };
  /*
   *
   */
   $scope.adjustPortFormToManual=function(t_index){

        delete $scope.portFormData[t_index].onHours;
        delete $scope.portFormData[t_index].offHours;

        delete $scope.portFormData[t_index].onMinutes;
        delete $scope.portFormData[t_index].offMinutes;

        delete $scope.portFormData[t_index].onSeconds;
        delete $scope.portFormData[t_index].offSeconds;

        delete $scope.portFormData[t_index].humidityLevel_SwitchOff;
        delete $scope.portFormData[t_index].humidityLevel_SwitchOn;

        delete $scope.portFormData[t_index].max_or_min_Humidity_SwitchOff;
        delete $scope.portFormData[t_index].max_or_min_Humidity_SwitchOn;

        delete $scope.portFormData[t_index].min_Temperature_Limit;
        delete $scope.portFormData[t_index].max_Temperature_Limit;

        delete $scope.portFormData[t_index].deviceState_MinTempLevel;
        delete $scope.portFormData[t_index].deviceState_MaxTempLevel;

        $scope.portFormData[t_index].portState = "OFF";
        $scope.portFormData[t_index].portCtrlType = 'manual';

   }

    /*
     *
     */
     $scope.adjustPortFormToInterval=function(t_index){

          delete $scope.portFormData[t_index].portState;
          delete $scope.portFormData[t_index].humidityLevel_SwitchOff;
          delete $scope.portFormData[t_index].humidityLevel_SwitchOn;

          delete $scope.portFormData[t_index].max_or_min_Humidity_SwitchOff;
          delete $scope.portFormData[t_index].max_or_min_Humidity_SwitchOn;

          delete $scope.portFormData[t_index].portState;
          delete $scope.portFormData[t_index].humidityLevel_SwitchOff;
          delete $scope.portFormData[t_index].humidityLevel_SwitchOn;

          delete $scope.portFormData[t_index].max_or_min_Humidity_SwitchOff;
          delete $scope.portFormData[t_index].max_or_min_Humidity_SwitchOn;

          delete $scope.portFormData[t_index].min_Temperature_Limit;
          delete $scope.portFormData[t_index].max_Temperature_Limit;

          delete $scope.portFormData[t_index].deviceState_MinTempLevel;
          delete $scope.portFormData[t_index].deviceState_MaxTempLevel;

          $scope.portFormData[t_index].onHours    = 0;
          $scope.portFormData[t_index].offHours   = 0;

          $scope.portFormData[t_index].onMinutes  = 0;
          $scope.portFormData[t_index].offMinutes = 0;

          $scope.portFormData[t_index].onSeconds   = 0;
          $scope.portFormData[t_index].offSeconds  = 0;

          $scope.portFormData[t_index].portCtrlType = 'interval';


     }
     /*
      *
      */
      $scope.adjustPortFormToTemperature=function(t_index){

           delete $scope.portFormData[t_index].portState;

           delete $scope.portFormData[t_index].onHours;
           delete $scope.portFormData[t_index].offHours;

           delete $scope.portFormData[t_index].onMinutes;
           delete $scope.portFormData[t_index].offMinutes;

           delete $scope.portFormData[t_index].onSeconds;
           delete $scope.portFormData[t_index].offSeconds;

           $scope.portFormData[t_index].portCtrlType = 'temperature';

           $scope.portFormData[t_index].min_Temperature_Limit = 0;
           $scope.portFormData[t_index].max_Temperature_Limit = 0;

           $scope.portFormData[t_index].deviceState_MinTempLevel = "OFF";
           $scope.portFormData[t_index].deviceState_MaxTempLevel = "OFF";

      }
     /*
      *
      */
      $scope.adjustPortFormToHumidity=function(t_index){


           delete $scope.portFormData[t_index].portState;

           delete $scope.portFormData[t_index].min_Temperature_Limit;
           delete $scope.portFormData[t_index].max_Temperature_Limit;

           delete $scope.portFormData[t_index].deviceState_MinTempLevel;
           delete $scope.portFormData[t_index].deviceState_MaxTempLevel;

           delete $scope.portFormData[t_index].onHours;
           delete $scope.portFormData[t_index].offHours;

           delete $scope.portFormData[t_index].onMinutes;
           delete $scope.portFormData[t_index].offMinutes;

           delete $scope.portFormData[t_index].onSeconds;
           delete $scope.portFormData[t_index].offSeconds;

           $scope.portFormData[t_index].portCtrlType = 'humidity';

           $scope.portFormData[t_index].humidityLevel_SwitchOff = 0;
           $scope.portFormData[t_index].humidityLevel_SwitchOn  = 0;

           $scope.portFormData[t_index].max_or_min_Humidity_SwitchOff = 'MIN';
           $scope.portFormData[t_index].max_or_min_Humidity_SwitchOn  = 'MIN';


      }

});
