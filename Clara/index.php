<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Noah Climate Control</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
  <script src="customJS/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!--<script src="customJS/angular.min.js"></script>-->
  <script data-require="angular.js@1.3.13" data-semver="1.3.13" src="https://code.angularjs.org/1.3.13/angular.js"></script>
  <script data-require="angular-bootstrap@0.12.0" data-semver="0.12.0" src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.12.0.min.js"></script>

  <!-- custom angular js modules and controllers-->
  <script src="customJS/modules/gpioForm.js"></script>
  <script src="customJS/modules/navbar.js"></script>

</head>
<body ng-app ="claraApp">
<!-- navbar -->
  <div ng-include src="'forms/navbar.php'">
  </div>
<!-- GPIO Port Form-->
<div ng-include src="'forms/gpioRelay.php'">
</div>
</body>
</html>
