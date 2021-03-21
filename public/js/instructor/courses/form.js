      //Slug automático
      document.getElementById("title").addEventListener('keyup', slugChange);

      function slugChange(){

          title = document.getElementById("title").value;
          document.getElementById("slug").value = slug(title);
      }

      function slug (str) {
          var $slug = '';
          var trimmed = str.trim(str);
          $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
          replace(/-+/g, '-').
          replace(/^-|-$/g, '');
          return $slug.toLowerCase();
      }

      //CKeditor
      ClassicEditor
          .create( document.querySelector( '#description' ) )
          .then( editor => {
                  console.log( editor );
          } )
          .catch( error => {
                  console.error( error );
          } );
      //

       //Cambiar imagen
      document.getElementById("file").addEventListener('change', cambiarImagen);

      function cambiarImagen(event){
          var file = event.target.files[0];

          var reader = new FileReader();
          reader.onload = (event) => {
              document.getElementById("picture").setAttribute('src', event.target.result);
          };

          reader.readAsDataURL(file);
      }
