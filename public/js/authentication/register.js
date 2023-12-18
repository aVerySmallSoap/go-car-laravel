document.querySelector("#form-register").addEventListener("submit", e => {
   e.preventDefault();
   let formData = new FormData;
   document.querySelectorAll("#form-register>.form-row>input")
       .forEach(input => {
           formData.set(input.name, input.value);
       });
   document.querySelectorAll("#form-register>.form-row>select")
       .forEach(select => {
          formData.set(select.name, select.value);
       });
   let xhr = new XMLHttpRequest();
   xhr.open("POST", "/register/store", true);
   xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector("meta[name=csrf_token]").getAttribute('content'));
   xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
   xhr.send(formData);
   xhr.onload = function (){
       let res = JSON.parse(xhr.response);
       if(res.type === 'success'){window.location.href = '/login'}
   }
});
