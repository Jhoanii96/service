let quantity = document.getElementById('cantidad')
const buttonEnviar = document.getElementById('button')
const questions = document.getElementById('questions')

buttonEnviar.addEventListener('click',(event)=>{
  event.preventDefault();
  let showQuestion = '';
  quantity = parseInt(quantity.value)

  showQuestion += '<div class="row">'
  for (let i = 1; i <= quantity; i++) {
    showQuestion +=   '<div class="col-md-6">'
    showQuestion +=     '<div class="input-group mb-2">'
    showQuestion +=       '<div class="input-group-prepend">'
    showQuestion +=         '<span class="input-group-text">Pregunta '+i+':</label>'
    showQuestion +=       '</div>'
    showQuestion +=       '<input type="text" class="form-control">'  
    showQuestion +=     '</div>'
    showQuestion +=   '</div>'
  }
  showQuestion +=  '</div>'
  
  showQuestion += '<button class="btn btn-primary mb-2 mt-2">Guardar</button>';
  questions.innerHTML = showQuestion;
})