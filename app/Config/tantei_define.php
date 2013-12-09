<?php
// 自称探偵管理ツール　定義一覧

//共通テキスト
$config["CommonText"] = array(
    "confirm"        => "確認",
    "delete"       => "削除",
    "search"       => "検索",
	"prev"       => "前へ",
	"next"       => "次へ",
	"ref"			=> "参照",
	"send"			=> "送信",
	"off"		=> "解除",
);

//ページタイトル
$config["PageTitle"] = array(
    "users"    => "ユーザー管理",
    "usersEdit"    => "ユーザー管理＞詳細",
    "eventAnnouncements"	=> "イベント管理",
    "itemSends"	=> "プレゼント付与",
    "maintenances" => "メンテナンス",
);

//情報名
$config["InfoName"] = array(
    "users"    => "ユーザー情報",
    "eventAnnouncements"	=> "イベント管理情報",
    "itemSends"    => "プレゼント付与情報",
    "maintenances"    => "メンテナンス情報",
);

//ユーザー管理で使用する文言
$config["UsersText"] = array(
    "id"    => "ユーザーID",
    "dmm_code"    => "DMMのユーザーID",
    "user_name"    => "ユーザーネーム",
    "user_family_name"    => "姓",
    "first_name"    => "名",
    "nick_name"    => "ニックネーム",
    "is_profile_finished"    => "登録完了フラグ",
    "level"    => "レベル",
    "experience_point"    => "経験値",
    "physical_time"    => "体力全回復までのタイムスタンプ",
    "max_physical_point"    => "体力上限値",
    "voice_volume"    => "ボイス音量",
    "bgm_volume"    => "BGM音量",
    "se_volume"    => "SE音量",
    "text_speed"    => "テキスト送り速度",
    "game_point"    => "ゲーム内通貨",
    "coin"    => "課金ポイント",
    "album_count"    => "アルバムの保存数",
    "max_album_count"    => "アルバムの上限数",
    "last_tutorial_id"    => "チュートリアルの進行ページID",
    "is_tutorial_finished"    => "チュートリアル完了フラグ",
    "stamp_card_count"    => "ログインスタンプ受け取り回数",
    "last_login_bonus_at"    => "ログインボーナスの最終受取日時",
    "last_clear_character_id"    => "最後にクリアしたクエストのキャラクターID",
    "pre_registration_at"    => "事前登録受付日時",
    "last_access_at"    => "最終ログイン日時",
    "del_flag"    => "削除フラグ",
    "created"    => "作成日時",
    "modified"    => "更新日時",
);

//イベント管理で使用する文言
$config["EventAnnouncementsText"] = array(
    "title"    => "タイトル名",
    "start_at"    => "イベント期間",
    "scenario_title"    => "シナリオ名",
);

//プレゼント付与で使用する文言
$config["ItemSendsText"] = array(
    "notice_at"    => "表示上の掲載時間",
    "start_at"    => "掲載、送付開始日時",
    "end_at"    => "掲載、送付終了日時",
    "comment"    => "メッセージ",
    "item_id"    => "アイテムID",
    "item_amount"    => "アイテムの数",
);

//メンテナンスで使用する文言
$config["MaintenancesText"] = array(
	"start_at"    => "メンテナンス期間",
	"maintenanceNow"    => "現在、メンテナンス中です。",
);

//確認メッセージ
$config["ConfirmMsg"] = array(
    "delete"        => "%sを削除します。よろしいですか？",
    "update"       => "%sを更新します。よろしいですか？",
    "maintenanceOn" => "メンテナンスモードを設定します。よろしいですか？",
    "maintenanceOff" => "メンテナンスモードを解除します。よろしいですか？",
);

//結果メッセージ
$config["ResultMsg"] = array(
    "delete"        => "%sの削除が完了しました。",
    "update"       => "%sの更新が完了しました。",
    "maintenanceOnf" => "メンテナンスモードを設定しました。",
    "maintenanceOff" => "メンテナンスモードを解除しました。",
);

//エラーメッセージ
$config["ErrorMsg"] = array(
    "notEmpty"        => "%sが空になっています。値を入力してください。",
    "between"       => "%sは%d文字以上、%d文字以下で入力してください。",
    "minLength"       => "%sは%d文字以上で入力してください。",
  	"minLength"       => "%sは%d文字以下で入力してください。",
  	"deleteFail"       => "%sの削除に失敗しました。",
  	"updateFail"       => "%sの更新に失敗しました。",
  	"startDateAfterEndDate"		=> "開始日時は終了日時より前にしてください。",
  	"fileUpdateFail"		=> "ファイルアップロードに失敗しました。",
  	"fileTypeWrong"		=> "ファイル形式が正しくありません。",
  	"changeMaintenanceFail"		=> "メンテナンスモード切り替えに失敗しました。",
);

?>