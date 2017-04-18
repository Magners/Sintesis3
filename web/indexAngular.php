<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Angular</title>
        <link href="../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!--<script src="../angular/newjavascript.js" type="text/javascript"></script>-->
        <script src="../libs/angular_basic/angular.min.js" type="text/javascript"></script>
        <script src="../libs/angular_basic/angular-resource.min.js" type="text/javascript"></script>
        <script src="../libs/angular_basic/ng-order-object-by.js" type="text/javascript"></script>
        <script src="../angular/controller.js" type="text/javascript"></script>
        <script src="../angular/service.js" type="text/javascript"></script>

    </head>
    <body ng-app="myApp" ng-controller="myCtrl">
        <div class="container">
            <div class="row">
                <div class="page-header">
                    <h1 align="center">Angular</h1>
                </div>
            </div>

            <div class="row">


                <button  type="button" class="btn btn-block btn-info" ng-click="loadImage()">Begin</button>

            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div id="image" height="100" width="100">
                        <img src="{{image.ruta}}" alt="" ng-mouseenter="loadClue()" ng-mouseleave="loadAns()"/>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!--Pista-->
                    <div class="row">
                        <h3>
                            {{pista.pista}}
                        </h3>
                    </div>

                </div>
                <!--pregunta-->
                <div ng-switch="dispAns" class="row">

                    <div ng-switch-when="true">
                        <button type="button" class="btn btn-info btn-block" ng-click="evaluateAns(true)" id="goodAns">{{pregunta.good}}</button>
                        <button type="button" class="btn btn-info btn-block" ng-click="evaluateAns(false)" id="badAns">{{pregunta.bad}}</button>
                    </div>
                </div>



            </div>

            <div class="row">
            <div class="col-lg-6">
                    <!--Reg-->                                        
                    <h3>Registrar</h3>
                    <hr>
                    <label>Nombre</label>
                    <input type="text" class="form-control" ng-model="user.nombre" ng-change="user.puntos=0">
                    <label>Edad</label>
                    <input type="text" class="form-control" ng-model="user.edad">
                    <label>Email</label>
                    <input type="text" class="form-control" ng-model="user.mail">
                    <label>Puntos</label>
                    <input type="number" class="form-control" disabled="" ng-model="user.puntos">
                    <hr>
                    <button type="button" class="btn btn-info col-lg-offset-5" ng-click="insertUser()">New / Update</button>
                </div>
                <div class="col-lg-6">
                    <h3>Ranking</h3>
                    <!--{{users}}-->
                    <div class="row">

                        <div class="col-lg-2" ng-click="setCriteria('nombre')">
                            Nombre
                        </div>
                        <div class="col-lg-2" ng-click="setCriteria('edad')">
                            Edad
                        </div>
                        <div class="col-lg-2" ng-click="setCriteria('puntos')">
                            Puntos
                        </div>
                        <div class="col-lg-2" >
                          mail
                        </div>
                        <div class="col-lg-1">
                            Del
                        </div>
                        <div class="col-lg-1">
                            Edit
                        </div>
                        <div class="col-lg-1">
                            ver
                        </div>
                    </div>
                    <hr>
                    <div class="row" ng-repeat="x in users| orderBy:orderCriteria:orderSort track by $index">
                        <div class="col-lg-2">
                            {{x.nombre}}
                        </div>
                        <div class="col-lg-2">
                            {{x.edad}}
                        </div>
                        <div class="col-lg-2">
                            {{x.puntos}}
                        </div>
                        <div class="col-lg-2">
                            {{x.mail}}
                        </div>
                        <div class="col-lg-1">
                            <button type="button" class="btn btn-danger" ng-click="delPlayer(x.nombre)">X</button>
                        </div>
                        <div class="col-lg-1">
                            <button type="button" class="btn btn-default" ng-click="editPlayer(x.nombre, x.edad, x.puntos, x.mail)">E</button>
                        </div>
                        <div class="col-lg-1">
                            <button type="button" class="btn btn-default" ng-click="verPlayer(x.nombre, x.edad, x.puntos)">V</button>
                        </div>

                    </div>

                    <hr>
                    <button type="button" class="btn btn-info col-lg-offset-5" ng-click="loadUsers()">Actualizar</button>


            </div>
            </div>
            <div class="row">
                <hr>
                <a class="btn btn-primary" href='index.php'>Retroceder</a>
            </div>
        </div>
    </body>
</html>