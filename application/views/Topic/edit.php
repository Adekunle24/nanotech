<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<script src="js/angular.js"></script>
<section class="content" ng-app="">

    <?=(isset($response)?$response:"")?>
    <p style="color: red"><?=validation_errors()?></p>
    <form action="topic/edittopic" method="post">    <div>
            <div class="form-group">
                <label for="exampleInputEmail1">Course Topic</label>
                <textarea class="form-control" rows="3" required="required" name="topic" placeholder="Enter ..."><?=$topic?></textarea>
            </div>
            <div class="form-group">
                <div class="form-group" ng-controller="serviceController">
                    <label>Service name</label>
                    <select name="service_name_id" class="form-control" >
                        <option id="greet" value="<?=$service_name_id?>" ng-selected="selected"><?=$service_name?></option>
                        <option  value="{{x.id}}" ng-repeat="x in names">{{x.service_name}}</option>
                    </select>
                </div>
            </div>
             <div class="form-group">               
               <input type="hidden" value="<?=$guid?>" name="id" />
            </div>
            <div class='row'>
                <div class='col-md-12'>
                    <input type="submit" value="Update" class="btn-sm btn-primary">
                    <hr>
                </div>
    </form>
    <script>
                function serviceController($scope,$http) {
            $http.get("<?=$this->config->item('base_url')?>service/servicelist")
                .success(function(response) {$scope.names = response;});
        }
    </script>
     
    
   </section>



<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

