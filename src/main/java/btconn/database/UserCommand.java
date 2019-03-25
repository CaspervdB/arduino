package btconn.database;


import java.sql.ResultSet;

public class UserCommand {
    private int id;
    private int userid;
    private String command;


    public UserCommand(int id, int userid, String command) {
        this.id = id;
        this.userid = userid;
        this.command = command;
    }

    public int getId() {
        return id;
    }

    public int getUserid() {
        return userid;
    }

    public String getCommand() {
        return command;
    }

    public void setId(int Id) {
        this.id = id;
    }

    public void setUserid(int userid) {
        this.userid = userid;
    }

    public void setCommand(String command) {
        this.command = command;
    }

    @Override
    public String toString()
    {
        return "User id: " + userid + "\n"
                + "ID: " + id + "\n"
                + "Command: " + command;
    }
}

