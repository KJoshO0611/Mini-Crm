$(function() {

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });


    if(update){
      var session = 'update';
    }

    if(error){
      var session = 'error';
    };

    if(deleted){
        var session = 'delete';
      };

      if(insert){
        var session = 'insert';
      };

      if (email) {
        var session = 'email'
      };

    switch(session){
      case 'update':
                    $(function() {
                        Toast.fire({
                          type: 'success',
                          title: 'Record Successfully Updated.',
                        })
                      });
      break;
      case 'error':
                  $(function() {
                    Swal.fire({
                        title: 'Opps',
                        type: 'error',
                        toast: true,
                        position: 'top-end',
                        html:jQuery("#error_copy").html(),
                        showCloseButton: true,
                        showConfirmButton: false,
                      })
                    });
      break;
      case 'delete':
                    $(function() {
                        Toast.fire({
                          type: 'success',
                          title: 'Record Successfully Deleted.'
                        })
                      });
      break;
      case 'insert':
                    $(function() {
                        Toast.fire({
                            type: 'success',
                            title: 'Record Successfully Added.'
                        })
                        });
        break;
        case 'email':
                    $(function() {
                        Toast.fire({
                            type: 'success',
                            title: 'Record Successfully Added.Email Sent.'
                        })
                        });
        break;
        };

    });
