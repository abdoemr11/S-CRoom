Smart Classroom depend mainly on the concept of real-time communication between students and their professor, this brings 
many challengs and obstacles. 
In this chapter we will go through how we used many web standard to achive full-duplex bidirectional communication that 
are used in the smart classroom, we will begin with broad discussion of different way to achive this funciontality
and the advantages and disadvantages of each approach. 

After that we will move to different internet
protocol like xmpp that are built upon websocket and see how they are implemented
and how different application tweak them for their need. Then we will
discuss how we implemented simple version of xmpp [RFC 6120] [1] 
standard core to meet our requirement. Finally will go through 
implementaion of this protocol using [php ratchet library] [2] 
and discuss various software engineering aspects.

## Bidirectional Stateful Communication
The internet began with Web 1.0  which refers to the first stage of the World Wide Web evolution. Earlier, there were only a few content creators in Web 1.0 with a huge majority of users who are consumers of content. Personal web pages were common, consisting mainly of static pages hosted on ISP-run web servers, or free web hosting services.

This approach continue to rule even when Web 2.0 came out we still
have high-end servers which contain multiple dataset and clients 
who use these server to obtain the information they need for example
when you want to search google.com the process goes as follow
--image--

We call this appraoch 
This is stateless one directional connection between you
and google, you send google request and the server respond.

Till now everything looks great but how about when we need to keep 
an active connection with the server where data can flow in both direction 
in same time in real-time like messengers application. The request response pipeline that we have
discussed so far is not the right solution to this dilemma, Next we will
see possiple answer to this quesetion.

### WebSockets
The WebSocket protocol, described in the specification RFC 6455, provides a way to exchange data between browser and server via a persistent connection. The data can be passed in both directions as “packets”, without breaking the connection and the need of additional HTTP-requests.

WebSocket is especially great for services that require continuous data exchange, e.g. online games, real-time trading systems and so on.

### Server Sent Events
The Server-Sent Events specification describes a built-in class EventSource, that keeps connection with the server and allows to receive events from it.

Similar to WebSocket, the connection is persistent.

But there are several important differences:

| WebSocket                                                    | EventSource                              |
|--------------------------------------------------------------|------------------------------------------|
| Bi-directional: both client and server can exchange messages | 	One-directional: only server sends data |
| Binary and text data	                                        | Only text                                |
| WebSocket protocol	                                          | Regular HTTP                             |

### Long polling
Long polling is the simplest way of having persistent connection with server, that doesn’t use any specific protocol like WebSocket or Server Side Events.

Being very easy to implement, it’s also good enough in a lot of cases.

Regular Polling
The simplest way to get new information from the server is periodic polling. That is, regular requests to the server: “Hello, I’m here, do you have any information for me?”. For example, once every 10 seconds.

In response, the server first takes a notice to itself that the client is online, and second – sends a packet of messages it got till that moment.

That works, but there are downsides:

Messages are passed with a delay up to 10 seconds (between requests).
Even if there are no messages, the server is bombed with requests every 10 seconds, even if the user switched somewhere else or is asleep. That’s quite a load to handle, speaking performance-wise.
So, if we’re talking about a very small service, the approach may be viable, but generally, it needs an improvement.

Long polling
So-called “long polling” is a much better way to poll the server.

It’s also very easy to implement, and delivers messages without delays.

The flow:

--image--


A request is sent to the server.
The server doesn’t close the connection until it has a message to send.
When a message appears – the server responds to the request with it.
The browser makes a new request immediately.
The situation when the browser sent a request and has a pending connection with the server, is standard for this method. Only when a message is delivered, the connection is reestablished.
If the connection is lost, because of, say, a network error, the browser immediately sends a new request.

In conclusion WebSocket provide the best solution to achieve real-time
bidirectional communication efficiently. It didn't depend on certain
browser or environment moreover it didn't wast bandwidth for 
necessary operations.














[1]: https://xmpp.org/rfcs/rfc6120.html
