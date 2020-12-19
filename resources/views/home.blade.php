@extends('layout.app')
@section('content')
<main role="main">
  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="typeQuery">Tipo Consulta</label>
          <select id="typeQuery" class="form-control" onchange="typeNews(this.value)">
            <option value="">Seleccione...</option>
            <option value="top-headlines">Top Noticias</option>
            <option value="everything">Todo</option>
          </select>
        </div>
      </div>

      <div class="col-md-3" id="div_category" style="display: none">
        <div class="form-group">
          <label for="category">Categorias</label>
          <select id="category" class="form-control">
            <option value="">Seleccione...</option>
            <option value="technology">Tecnologia</option>
            <option value="business">Negocios</option>
            <option value="science">Ciencia</option>
            <option value="sports">Deportes</option>
            <option value="health">Salud</option>
          </select>
        </div>
      </div>

      <div class="col-md-3" id="div_query" style="display: none">
        <div class="form-group">
          <label for="query">Buscar</label>
          <input type="text" id="query" class="form-control">
        </div>
      </div>

      <div class="col-md-1">
        <button type="button" onclick="loadNews()" class="btn btn-primary mt-4">
          Buscar
        </button>
      </div>

    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row" id="news"></div>


    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>© 2017-2018 Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
  </footer>
</main>
</body>
@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    loadNews()
  });

  function loadNews() {
    const url = "https://newsapi.org/v2";
    const apiKey = "de8e05adc57846ceac44b904a1fcc6ba";

    let typeQuery = $('#typeQuery').val();
    let category = $('#category').val();
    let query = $('#query').val();

    
    if (typeQuery == "") {
      typeQuery = "top-headlines";
    }
    
    let datos = {
      apiKey: apiKey,
      country: "co",
    }

    if (typeQuery === 'everything') {
      datos = {
        apiKey: apiKey,
        q:query,
        language: "es"
      }
    }else{
      datos = {
        apiKey: apiKey,
        country: "co",
        category: category,
      }
    }
    console.log(datos);
    $.ajax({
      url: `${url}/${typeQuery}`,
      data:datos,
      type: "GET",
      dataType: 'json',
      success: function(res) {
        let noticias = '';
        for (let i = 0; i < res.articles.length; i++) {
          const noticia = res.articles[i];
          noticias = noticias+`<div class="row featurette mb-3">
                      <div class="col-md-7">
                        <h2 class="featurette-heading">${noticia.title}</h2>
                        <p class="lead">${noticia.description}. <a href="${noticia.url}" target="_blank">Ver mas</a></p>
                      </div>
                      <div class="col-md-5">
                        <img class="featurette-image img-fluid mx-auto"  alt="noticia" src="${noticia.urlToImage}" data-holder-rendered="true">
                        <p>${noticia.publishedAt}</p>
                      </div>
                    </div>
                    <hr class="featurette-divider">`
        }
        
        $('#news').html(noticias)
      }
    });
  }

  function typeNews(Type) {
    if (Type === 'everything') {
      $('#div_category').hide();
      $('#div_query').show();
    }else{
      $('#div_query').hide();
      $('#div_category').show();
    }
  }
</script>
@endsection