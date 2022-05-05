import java.io.*;  
import javax.servlet.*;  
import javax.servlet.http.*;  
import java.sql.*;  
    
public class Display extends HttpServlet  
{    
     public void doGet(HttpServletRequest req, HttpServletResponse res) throws IOException, ServletException 
      {  
         PrintWriter out = res.getWriter();  
         res.setContentType("text/html");  
         out.println("<html><body>");  
         try 
         {  
             Class.forName("com.mysql.jdbc.Driver");  
             Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/wt", "root", "");  
             Statement stmt = con.createStatement();  
             ResultSet rs = stmt.executeQuery("select * from ebookshop");  
             out.println("<table border=1 width=10% height=10%>");  
             out.println("<tr><th>Book ID</th><th>Book Title</th><th>Book Author</th><th>Book Price</th><th>Quantity</th><tr>");  
             while (rs.next()) 
             {  
                 int bookid = rs.getInt("book_id");  
                 String booktitle = rs.getString("book_title");
                 String bookauthor = rs.getString("book_author");  
                 String bookprice = rs.getString("book_price");
                 String quantity = rs.getString("quantity");     
                 out.println("<tr><td>" + bookid + "</td><td>" + booktitle + "</td><td>" + bookauthor + "</td><td>" + bookprice + "</td><td>" + quantity + "</td></tr>");   
             }  
             out.println("</table>");  
             out.println("</html></body>");  
             con.close();  
            }  
             catch (Exception e) 
            {  
             out.println(e);  
         }  
     }  
 }  