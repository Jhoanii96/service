let quantity = document.getElementById('cantidad')
let buttonEnviar = document.getElementById('button')
let questions = document.getElementById('questions')

buttonEnviar.addEventListener('click',(event)=>{
  event.preventDefault();
  let showQuestion = '';
  quantity = parseInt(quantity.value)

  showQuestion += '<form>'
  showQuestion +=   '<div class="row">'
  for (let i = 1; i <= quantity; i++) {
    showQuestion +=   '<div class="col-md-6">'
    showQuestion +=     '<div class="input-group mb-2">'
    showQuestion +=       '<div class="input-group-prepend">'
    showQuestion +=         '<span class="input-group-text">Pregunta '+i+':</span>'
    showQuestion +=       '</div>'
    showQuestion +=       '<input type="text"  class="form-control" id="question'+i+'">'  
    showQuestion +=     '</div>'
    showQuestion +=   '</div>'
  }
  showQuestion +=  '</div>'
  showQuestion += '</form>'
  
  showQuestion += '<button class="btn btn-primary mb-2 mt-2" id="btn_question" onClick="showQuestions()">Guardar</button>'
  questions.innerHTML = showQuestion;
})

function showQuestions(){

  // let btn_saveQuestion = document.getElementById('btn_question')
  let tableQuestion = document.getElementById('tableQuestions')

  // btn_saveQuestion.addEventListener('click',(event)=>{
  //   event.preventDefault();
    
    let createTableQuestions = '';
    createTableQuestions += '<div class="card-body">'
    createTableQuestions += '<h5 class="card-title">Preguntas</h5>'
    createTableQuestions += '<table class="table">'
    createTableQuestions += '<thead>'
    createTableQuestions += '<tr>'
    createTableQuestions += '<th>N</th>'
    createTableQuestions += '<th>Preguntas</th>'
    createTableQuestions += '<th>Opciones</th>'
    createTableQuestions += '</tr>'
    createTableQuestions += '</thead>'
    createTableQuestions += '<tbody>'
    
    for (let i = 0; i < 10; i++) {
      for (let j = 0; j < 3; j++) {
        if(j==0){
          createTableQuestions += '<tr>'
          createTableQuestions += '<td>'+i+'</td>'
        }
        else if(j==3){
          createTableQuestions += '</tr>'
          // createTableQuestions += '<td>salute'+j+'</td>'
        }else if(j==2){
          createTableQuestions += '<td><button type="button" class="btn btn-info"><i class="fas fa-edit"></i>  Editar</button>'
          createTableQuestions += '<button type="button" class="btn btn-danger ml-2"><i class="fas fa-trash-alt"></i>  Eliminar</button></td>'
        }
        else {
          createTableQuestions += '<td>salute'+j+'</td>'
        }
      }
    }
    createTableQuestions += '</tbody>'
    createTableQuestions += '</table>'
    createTableQuestions += '</div>'
    tableQuestion.innerHTML = createTableQuestions;
}
