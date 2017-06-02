      <div class="container">
        <h1>Utilisateurs</h1>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Adresse</th>
            </tr>
            <?php foreach ($users as $user): ?> 
            <tr>
                <td><?= $user->getId();?></td>
                <td><?= $user->getLastname();?></td>
                <td><?= $user->getFirstname();?></td>
                <td><?= $user->getEmail();?></td>
                <td><?= $user->getAdress();?></td>
            </tr> 
            <?php endforeach; ?>
        </table>
    </div>