<?php

namespace App\Controllers;

class Chat extends BaseController
{
    protected $chatModel;
    public function __construct()
    {
        $this->chatModel = new \App\Models\ChatModel();
        $this->usersModel = new \App\Models\User();
    }

    public function index()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        try {
            parse_str($url['query'], $params);
        } catch (\Exception $e) {
            return view('errors/html/error_404');
        }

        $chat = $this->chatModel->where('post_id', intval($params['id']))->findAll();
        $user = $this->usersModel->findAll();
        $userName = [];

        foreach ($user as $u) :
            $userName[$u['id']] = $u['fullname'];
        endforeach;

        $data = [
            'title' => "Discussion",
            'chat' => $chat,
            'user' => $userName,
            'user_id' => user_id(),
            'discussion_id' => $params['id'],
        ];

        if (count($chat)) {
            return view('chat/discussion', $data);
        }
        return view('errors/html/error_404');
    }

    public function send()
    {
        $this->chatModel->save([
            'user_id' => $this->request->getVar('user_id'),
            'post_id' => $this->request->getVar('discussion_id'),
            'content' => $this->request->getVar('chat'),
            'created_at' => date('Y-m-d H:i:s', time())
        ]);

        return redirect()->to("/discussion?id=" . '' . $this->request->getVar('discussion_id'));
    }
}
