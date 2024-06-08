function AtualizarModelosCpu(){
    //Definindo Variaveis
    var marca = document.getElementById('marca').value
    var modeloSelect = document.getElementById('modeloCpu')

    modeloSelect.innerHTML = '<option value="processador">Selecione o processador</option>'

    //Criação de uma lista para os modelos
    let ListaModelos = []
    if (marca === 'intel'){
        ListaModelos = ['Intel Core i3 14100F', 'Intel Core i5 14100F', 'Intel Core i7 14100F', 'Intel Core i9 14100F']
    }
    else if (marca === 'amd'){
        ListaModelos = ['Ryzen 7 8700G', 'Ryzen 5 8600G', 'Ryzen 5 8500G']
    }
    
    //Alterando os valores das opções
    ListaModelos.forEach(modeloCpu => {
        var option = document.createElement('option')
        option.value = modeloCpu.toLowerCase().replace(/ /g, '-')
        option.textContent = modeloCpu
        modeloSelect.appendChild(option)
    })
}
function AtualizarModelosGpu(){
      //Definindo Variaveis
      var marca1 = document.getElementById('marca1').value
      var modeloSelect = document.getElementById('modeloGPU')
  
      modeloSelect.innerHTML = '<option value="placadevideo">Selecione a placa de video</option>'
  
      //Criação de uma lista para os modelos
      let ListaModelos = []
      if (marca1 === 'nvidia'){
          ListaModelos = ['RTX 4060','RTX 4070','RTX 4080', 'RTX 4090']
      }
      else if (marca1 === 'amd'){
          ListaModelos = ['RX 7900 XT', 'RX 7800 XT', 'RX 7700 XT', 'RX 7600 XT']
      }
      
      //Alterando os valores das opções
      ListaModelos.forEach(modeloGpu => {
          var option = document.createElement('option')
          option.value = modeloGpu.toLowerCase().replace(/ /g, '-')
          option.textContent = modeloGpu
          modeloSelect.appendChild(option)
      })
}
function Teste(){
    //Definindo variaveis 
    var modeloSelect = document.getElementById('modeloCpu').value
    var modeloSelect2 = document.getElementById('modeloGPU').value
    var modeloSelect3 = document.getElementById('modeloRam').value
    var modeloSelect4 = parseInt(document.getElementById('qtd').value, 10)
    var modeloSelect5 = document.getElementById('storage').value
    var modeloSelect6 = parseInt(document.getElementById('qtd1').value, 10)

    //equipamentos
    var cpu = 65
    var gpu = 0
    var ram = 0
    var storage = 5 * modeloSelect6

    
    //placa de video
    if(modeloSelect2 == 'rx-7900-xt'){
        gpu = 300
    }
    else if(modeloSelect2 == 'rx-7800-xt'){
        gpu = 263
    }
    else if(modeloSelect2 == 'rx-7700-xt'){
        gpu = 245
    }
    else if(modeloSelect2 == 'rx-7600-xt'){
        gpu = 200
    }
    //memoria ram
    if(modeloSelect3 == 'ddr4'){
        ram = 3 * modeloSelect4
    }
    else if(modeloSelect3 == 'ddr5'){
        ram = 4 * modeloSelect4
    }
    //calculo de consumo
    var calculo = cpu + gpu + ram + storage
    alert(`Consumo total estimado: ${calculo}W`)
}