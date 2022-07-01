<h1 id="heading">Applications</h1>
<div class="container">
    <table class="table table-hover table-light table-bordered" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Student Name</th>
                <th scope="col">Rooms</th>
                <th scope="col">Budget</th>
                <th scope="col">Stay from</th>
                <th scope="col">Stay To</th>
                <th scope="col">Details</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['student_name'] ?></td>
                    <td><?php echo $row['no_of_rooms'] ?></td>
                    <td><?php echo $row['monthly_budget'] ?></td>
                    <td><?php echo $row['stay_from'] ?></td>
                    <td><?php echo $row['stay_to'] ?></td>
                    <td><?php echo $row['details'] ?></td>
                    <td><span class="<?php echo StatusCss[$row['status']]?>"><?php echo ApplicationStatus[(int)$row['status']] ?></span></td>
                </tr>
            <?php }
            } ?>
        </tbody>
    </table>
</div>
