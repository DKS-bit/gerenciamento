<?php // Verifica a sessao.
include('../../auth/sessao.php');
sessaoValida();
?>
<?php include '../../../frontend/telaCadastroEndereco/cadastroEndereco.html'; ?>
<style>
    <?php include '../../../frontend/telaCadastroEndereco/style.css'; ?>
</style>
<script type="module">
   <?php include '../../../frontend/telaCadastroEndereco/script.js'; ?>
</script>