app.service("serv", ['$resource', function ($resource) {
        this.consultaAjaxUser = function () {
            return $resource('user.php/user/:id', null, {
                'get': {method: 'GET'},
                'save': {method: 'POST'},
                'query': {method: 'GET', isArray: true},
                'remove': {method: 'DELETE'},
                'delete': {method: 'DELETE'},
                'update': {method: 'PUT'}
            });
        };
        
        this.consultaAjaxPuzzle = function () {
            return $resource('serv.php/', null, {
                'get': {method: 'GET'},
                'save': {method: 'POST'},
                'query': {method: 'GET', isArray: true},
                'remove': {method: 'DELETE'},
                'delete': {method: 'DELETE'},
                'update': {method: 'PUT'}
            });
        };


    }]);