<%@ page import="java.sql.ResultSet" %>
<%@ page import="java.sql.Statement" %>
<%@ page import="java.sql.Connection" %>
<%@ page import="java.sql.DriverManager" %>
<html>
    <head>
        <title>Student Data</title>
        <link rel="stylesheet" href="style.css">

    </head>

<form method="post">
<center>
    <h1 style="margin-top: 50px;">Student Information</h1>
<table class="content-table"  border="2">
    <thead>
<tr >
<td>Student ID</td>
<td>Student Name</td>
<td>Class</td>
<td>Division</td>
<td>City</td>
</tr>
</thead>
<%
try
{
Class.forName("com.mysql.jdbc.Driver");
String url="jdbc:mysql://localhost:3306/wt";
String username="root";
String password="";
String query="select * from students_info";
Connection conn=DriverManager.getConnection(url, username, password);
Statement stmt=conn.createStatement();
ResultSet rs=stmt.executeQuery(query);
while(rs.next())
{

%>
<tr><td><%=rs.getInt("stud_id") %></td>
<td><%=rs.getString("stud_name") %></td>
<td><%=rs.getString("class") %></td>
<td><%=rs.getString("division") %></td>
<td><%=rs.getString("city") %></td></tr>

 <%

}
%>
</table>
<%
rs.close();
stmt.close();
conn.close();
}
catch(Exception e)
{
e.printStackTrace();
}
%>
</center>
</form>
</html>