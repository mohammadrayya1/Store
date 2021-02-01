


<script >


    (function()
    {
        var userNameField = document.querySelector('input[name=Username]');
        if(null !== userNameField) {
            userNameField.addEventListener('blur', function()
            {
                var req = new XMLHttpRequest();
                req.open('POST', 'http://www.mvcapp.dodo/employee/checkuserexistsajax');
                req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                req.onreadystatechange = function()
                {
                    var iElem = document.createElement('i');
                    if(req.readyState == req.DONE && req.status == 200) {
                        if(req.response == 1) {
                            iElem.className = 'fa fa-times error';
                        } else if(req.response == 2) {
                            iElem.className = 'fa fa-check success';
                        }
                        var iElems = userNameField.parentNode.childNodes;
                        for ( var i = 0, ii = iElems.length; i < ii; i++ )
                        {
                            if(iElems[i].nodeName.toLowerCase() == 'i') {
                                iElems[i].parentNode.removeChild(iElems[i]);
                            }
                        }
                        userNameField.parentNode.appendChild(iElem);
                    }
                }

                req.send("Username=" + this.value);
            }, false);
        }
    })();





    (function()
    {
        var emailField = document.querySelector('input[name=Email]');
        if(null !== emailField) {
            emailField.addEventListener('blur', function()
            {
                var req = new XMLHttpRequest();
                req.open('POST', 'http://www.mvcapp.dodo/employee/checkemailexistsajax');
                req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                req.onreadystatechange = function()
                {
                    var iElem = document.createElement('i');
                    if(req.readyState == req.DONE && req.status == 200) {
                        if(req.response == 1) {
                            iElem.className = 'fa fa-times error';
                        } else if(req.response == 2) {
                            iElem.className = 'fa fa-check success';
                        }
                        var iElems = emailField.parentNode.childNodes;
                        for ( var i = 0, ii = iElems.length; i < ii; i++ )
                        {
                            if(iElems[i].nodeName.toLowerCase() == 'i') {
                                iElems[i].parentNode.removeChild(iElems[i]);
                            }
                        }
                        emailField.parentNode.appendChild(iElem);
                    }
                }

                req.send("Email=" + this.value);
            }, false);
        }
    })();


</script>

</body>
</html>