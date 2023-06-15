
<?php
if(isset($data['ticket'])) {
$ticket = $data['ticket']['ticket'];
?>
    <div class="card">
        <div class="card-body">
            <div>
                Ticket Number : {{ $ticket['ticket_number'] }}
            </div>
                <?php 
                    $descriptions = json_decode($ticket['description'], true);
                    if(count($descriptions) > 0) {
                ?>
                <div class="table-responsive">
                    <table class="table table-striped">

                        <tbody>
                            <?php 
                                foreach ($descriptions as $key => $value) {
                            ?>
                                <tr>
                                    <th>
                                        {{ $key }}
                                    </th>
                                    <td>
                                        {{ $value }}
                                    </td>
                                </tr>
                            <?php 
                                }
                            ?>
                        </tbody>

                    </table>
                </div>
            <?php } ?>
        </div>
    </div>

<?php } ?>