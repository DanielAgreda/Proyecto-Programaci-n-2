import org.junit.jupiter.api.Test;
import org.mockito.Mockito;

import java.util.Arrays;

import static org.mockito.Mockito.*;

public class MessageTest {

    @Test
    void testBroadcastMessage() {
        
        Server server = Server.getInstance();

        
        ClientHandler client1 = mock(ClientHandler.class);
        ClientHandler client2 = mock(ClientHandler.class);
        ClientHandler sender = mock(ClientHandler.class);

        
        server.getActiveUsers().clear(); 
        server.getActiveUsers().addAll(Arrays.asList(client1, client2)); 

    }
}
