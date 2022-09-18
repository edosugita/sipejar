var quill = new Quill('#editor', {
    theme: 'snow'
  });

  const mySubmit = () => {
    var html = document.getElementById('editor').innerHTML;
    document.getElementById('articelcontent').value = html;
}
