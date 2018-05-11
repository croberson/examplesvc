<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="resources/css/css.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script type="text/javascript" src="resources/js/js.js"></script>
    
    <body>

        <div ng-app="superpowerApp" ng-controller="mainCtrl">
            <div>
                <form ng-submit="submitAddForm()">
                    <table class="add-table">
                        <tr>
                            <td>
                                Name:
                            </td>
                            <td>
                                <input type="text" ng-model="name" name="name" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Superpower:
                            </td>
                            <td>
                                <input type="text" ng-model="power" name="power" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="button-cell">
                                <input type="submit" id="submit" value="Add" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            
            <hr />
            
            <div>
                <h2>Superhero Registrar</h2>
                <table ng-show="data.pairings" class="pairings-table">
                    <tbody>
                        <tr>
                            <td>
                                <table class="inner-table">
                                    <tr>
                                        <td><b>Hero Name</b></td>
                                        <td><b>Superpower</b></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr ng-repeat="pairing in data.pairings">
                            <td>
                                <table class="inner-table">
                                    <tr ng-show="!editMode[pairing.id]">
                                        <td ng-click="enterEditMode(pairing)">
                                            {{pairing.name}}
                                        </td>
                                        <td ng-click="enterEditMode(pairing)">
                                            {{pairing.power}}
                                        </td>
                                        <td>
                                            <button ng-click="deletePairing(pairing)">X</button>
                                        </td>
                                    </tr>
                                    <tr ng-show="editMode[pairing.id]">
                                        <td>
                                            <input ng-model="pairing.name" type="text" />
                                        </td>
                                        <td>
                                            <input ng-model="pairing.power" type="text" />
                                        </td>
                                        <td>
                                            <button ng-click="editPairing(pairing)">Save</button>
                                            <button ng-click="exitEditMode(pairing)">Cancel</button>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <div ng-show="!data.pairings">There are no pairings at this time.</div>
            </div>
        </div>
    
    </body>
</html>