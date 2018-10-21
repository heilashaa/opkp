<h1>Main Index View</h1>

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


<div class="block">
    <table id="example" class="display compact" style="width:100%">
        <thead>
            <tr>
                <th>Номер запроса</th>
                <th>Дата запроса</th>
                <th>Клиент</th>
                <th>Маршрут</th>
                <th>Запрашиваемая територия</th>
                <th>Тип ПС</th>
                <th>Дата ответа</th>
                <th>Примечание</th>
                <th>Исполнитель</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Номер запроса</th>
                <th>Дата запроса</th>
                <th>Клиент</th>
                <th>Маршрут</th>
                <th>Запрашиваемая територия</th>
                <th>Тип ПС</th>
                <th>Дата ответа</th>
                <th>Примечание</th>
                <th>Исполнитель</th>
                <th></th>
                <th></th>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Номер запроса</th>
                <th>Дата запроса</th>
                <th>Клиент</th>
                <th>Маршрут</th>
                <th>Запрашиваемая територия</th>
                <th>Тип ПС</th>
                <th>Дата ответа</th>
                <th>Примечание</th>
                <th>Исполнитель</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>

