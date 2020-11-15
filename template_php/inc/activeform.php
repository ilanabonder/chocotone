<form method="POST" target="_blank" action="https://falarte.activehosted.com/proc.php" id="_form_3_">
    <input type="hidden" name="u" value="3" />
    <input type="hidden" name="f" value="3" />
    <input type="hidden" name="s" />
    <input type="hidden" name="c" value="0" />
    <input type="hidden" name="m" value="0" />
    <input type="hidden" name="act" value="sub" />
    <input type="hidden" name="v" value="3" />
    <input type='text' class='email' placeholder='Insira seu Nome' name='fullname' required />
    <input type='email' class="email" placeholder="Insira seu Melhor E-mail" name='email'
           required /><button id="_form_1_submit" class="_submit btn-laranja" type="submit"><?= (empty($AC_BUTTON) ? 'CADASTRAR E RECEBER!' : $AC_BUTTON); ?></button>
</form>