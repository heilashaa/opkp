<h1>Main Index View</h1>
<p>Это вид контроллера Main, который вставлен в шаблон DEFAULT</p>
<p><?= $name; ?></p>
<p><?= $age; ?></p>

<table>
    <tr>
    <td>Клиент</td>
    <td>Дата контракта</td>
    </tr>
    <? foreach ($clients as $client): ?>
        <tr>
            <td><?= $client->client; ?></td>
            <td><?= $client->contract_date ?></td>
        </tr>
    <? endforeach; ?>
</table>
