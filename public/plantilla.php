<ol>
    <?php for($x=0; $x <3; x++) : ?>
    <li class="curriculo" value="<?= $x ?>">
        <dl>
        <?php for($y=0; $y < 2; $y++) : ?>
            <dt>alumno</dt>
                <dd>Ana López</dd>

        <?php endfor; ?>
        </dl>
    </li>
    <?php endfor; ?>
</ol>
        
