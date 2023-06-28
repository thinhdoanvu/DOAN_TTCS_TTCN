using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using Microsoft.AspNet.SignalR;

namespace QLKS.Hubs
{
    public class ChatHub : Hub
    {
        public void Send(string name, string message)
        {
            // gọi phương thức addNewMessageToPage để cập nhật client.
            Clients.All.addNewMessageToPage(name, message);
        }
    }
}