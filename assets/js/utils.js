
async function executarRequest(postData = null, beforeSend = null, ulrIntegracao = null, timeOut = 30000) {
   
    var promise = Promise.resolve($.ajax({
       url: ulrIntegracao,
       dataType: 'json',
       method: postData == null ? 'GET' : 'POST',
       data: postData,
       timeout: timeOut
    })).then(data => {
       if (beforeSend != null) {
          if (beforeSend.swal.swalClose) {
             swal.close();
          }
       }
 
       return data;
    }).catch(data => {

       return {
          status: false,
          msg: 'Erro de conexão API',
          elementos: []
       };
    });
 
    return promise;
 
 }