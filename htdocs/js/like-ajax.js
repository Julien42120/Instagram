let likeBtns = document.querySelectorAll('.launcher-like')
let userId = document.querySelector('[data-idUser]').getAttribute('data-idUser')

likeBtns.forEach(likeBtn => {
    likeBtn.addEventListener('click',function(e){

       let likeFormData = new FormData
       likeFormData.append('id_photo', e.target.getAttribute('data-idphoto'))
       likeFormData.append('id_user', userId)


       fetch('/Users/process/like.php',{
           method: 'post',
           body: likeFormData
       })

    })
});