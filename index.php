<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de contato</title>
    <link rel="stylesheet" href="css/bulma.min.css">
    <!-- utilizando o Bulma para estilização do formulário ( https://bulma.io/ ) -->
</head>

<body>

    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <!-- é do bulma, centraliza o formulário no meio -->
                <div class="column is-half"> <!-- sempre criar o formulário e botões dentro desta classe de column --> 
                    <h1 class="title has-text-centered">Formulário de contato com PHP</h1>

                    <form action="enviar.php" method="POST"> <!-- quando clicar no btn de enviar, já é redirecionado para o enviar.php -->

                        <div class="field">
                            <label class="label">Nome</label>
                            <div class="control">
                                <input name="nome" class="input" type="text" placeholder="Seu nome">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">E-mail *</label>
                            <div class="control">
                                <input name="email" class="input" type="email" placeholder="Seu e-mail">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Assunto</label>
                            <div class="control">
                                <div class="select is-fullwidth"> <!-- classe para deixar o option com o mesmo tamanho dos inputs -->
                                    <select name="assunto">
                                        <option>Reportar erro</option>
                                        <option>Anúncios</option>
                                        <option>Outro</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Mensagem *</label>
                            <div class="control">
                                <textarea name="mensagem" placeholder="Deixe sua mensagem" 
                                class="textarea" maxlength="2000"></textarea>
                            </div>
                        </div>

                        <div class="field is-grouped"> <!-- se tiver vários botões, alinha todos sem dar quebra -->
                            <div class="control">
                                <button class="button is-link is-medium">Enviar</button>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </section>

</body>

</html>