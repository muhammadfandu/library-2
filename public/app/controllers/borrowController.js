app.controller('AdminController', function($scope,$http){
    $scope.pools = [];
  });
  
  app.controller('BorrowController', function(dataFactory,$scope,$http){
    $scope.data = [];
    $scope.libraryTemp = {};
    $scope.totalItemsTemp = {};
    $scope.totalItems = 0;
    $scope.pageChanged = function(newPage) {
      getResultsPage(newPage);
    };
    getResultsPage(1);
    function getResultsPage(pageNumber) {
        if(! $.isEmptyObject($scope.libraryTemp)){
            dataFactory.httpRequest('/borrows?search='+$scope.searchText+'&page='+pageNumber).then(function(data) {
              $scope.data = data.data;
              $scope.totalItems = data.total;
            });
        }else{
          dataFactory.httpRequest('/borrows?page='+pageNumber).then(function(data) {
            $scope.data = data.data;
            $scope.totalItems = data.total;
          });
        }
    }
    $scope.searchDB = function(){
        if($scope.searchText.length >= 3){
            if($.isEmptyObject($scope.libraryTemp)){
                $scope.libraryTemp = $scope.data;
                $scope.totalItemsTemp = $scope.totalItems;
                $scope.data = {};
            }
            getResultsPage(1);
        }else{
            if(! $.isEmptyObject($scope.libraryTemp)){
                $scope.data = $scope.libraryTemp ;
                $scope.totalItems = $scope.totalItemsTemp;
                $scope.libraryTemp = {};
            }
        }
    }
    $scope.saveAdd = function(){
      dataFactory.httpRequest('borrows','POST',{},$scope.form).then(function(data) {
        $scope.data.push(data);
        $(".modal").modal("hide");
      });
    }
    $scope.edit = function(id){
      dataFactory.httpRequest('borrows/'+id+'/edit').then(function(data) {
          console.log(data);
            $scope.form = data;
      });
    }
    $scope.newBorrow = function(id){
      dataFactory.httpRequest('pinjambuku').then(function(data) {
        $scope.books = data;
      });
      dataFactory.httpRequest('userpeminjam').then(function(data) {
        $scope.users = data;
      });
    }
    $scope.return = function(id){
      dataFactory.httpRequest('kembalikan/'+id+'').then(function(data) {
        console.log(data);
          $scope.form = data;
      });
    }
    $scope.saveReturn = function(){
      dataFactory.httpRequest('simpankembalikan/'+$scope.form.id,'POST',{},$scope.form).then(function(data) {
          $(".modal").modal("hide");
          $scope.data = apiModifyTable($scope.data,data.id,data);
      });
    }
    $scope.saveEdit = function(){
      dataFactory.httpRequest('borrows/'+$scope.form.id,'PUT',{},$scope.form).then(function(data) {
            $(".modal").modal("hide");
          $scope.data = apiModifyTable($scope.data,data.id,data);
      });
    }
    $scope.remove = function(item,index){
      var result = confirm("Are you sure delete this item?");
         if (result) {
        dataFactory.httpRequest('borrows/'+item.id,'DELETE').then(function(data) {
            $scope.data.splice(index,1);
        });
      }
    }
    $scope.refresh = function(item,index){
      dataFactory.httpRequest('/borrows').then(function(data) {
        $scope.data = data.data;
        $scope.totalItems = data.total;
      });
    }
  });