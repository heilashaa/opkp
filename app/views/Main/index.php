<h1>Main Index View</h1>


    <? foreach ($clientsRequests as $clientRequest): ?>
        <?= $clientRequest->clients_request; ?>
    <? endforeach; ?>



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

