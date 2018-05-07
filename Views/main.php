<div ng-controller="mainCtrl">
    <div>
        <form ng-submit="submit()" ng-controller="mainCtrl">
          Name: <input type="text" ng-model="name" name="name" /><br />
          Spirit Animal: <input type="text" ng-model="animal" name="animal" />
          <input type="submit" id="submit" value="Submit" />
        </form>
    </div>
    
    <hr />
    
    <div>
        <h2>Spirit Animal Pairings</h2>
        <ul ng-show="pairings">
            <li ng-repeat="pairing in pairings">
                {{pairing.name}} => {{pairing.animal}}
            </li>
        </ul>
        
        <div ng-show="!pairings">There are no pairings at this time.</div>
    </div>
</div>