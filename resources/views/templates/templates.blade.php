<script id="SearchUserResult" type="text/template">

    <tr>
        <td class="id"><a href="../user/<%= id %>" ><%= id %></a></td>
        <td class="email"><a href="../user/<%= id %>" ><%= email %></a></td>
        <td class="username"><%= firstname %></td>
        <td class="name"><%= name %></td>
        <td class="role"><%= role.slug %></td>
        <td class="created_at"><%=  moment(created_at).locale('fr').format('lll') %></td>
    </tr>

</script>