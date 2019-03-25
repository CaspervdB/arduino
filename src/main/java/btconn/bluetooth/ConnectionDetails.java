package btconn.bluetooth;

import javax.microedition.io.StreamConnection;
import java.io.DataOutputStream;

public class ConnectionDetails {
    private int userId;
    private StreamConnection conn;
    private DataOutputStream out;

    public ConnectionDetails(int userId, StreamConnection conn) throws Exception
    {
        this.userId = userId;
        this.conn = conn;
        out = conn.openDataOutputStream();
    }

    public void sendCommand(String command) throws Exception
    {
        out.writeUTF(command);
        out.flush();
    }

    public int getUserId()
    {
        return userId;
    }

    public void closeConnections() throws Exception
    {
        out.close();
        conn.close();
    }
}
