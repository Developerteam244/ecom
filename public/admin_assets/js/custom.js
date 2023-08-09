const deleteLinks = document.querySelectorAll('.delete')

deleteLinks.forEach(link => {
  link.addEventListener('click', function(event) {
    event.preventDefault();
    const deleteUrl = this.href;
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = deleteUrl;
      }
    });
  });
});

window.onload = ()=>{
    document.querySelector('.circle-loader').setAttribute('style','display:none;')
}