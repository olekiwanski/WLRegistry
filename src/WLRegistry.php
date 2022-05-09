<?php


namespace WLRegistryAPI;

/**
 * Repository: https://github.com/olekiwanski/wlregistry
 * Official api reference: https://wl-api.mf.gov.pl
 */
class WLRegistry
{

    const API_DOMAIN = "https://wl-api.mf.gov.pl";
    protected $date;


    public function __construct()
    {
        $this->date = date('Y-m-d');
    }

    public function searchSingleSubjectByNip(string $nip): ResultSingle|ErrorResponse
    {
        $response = $this->_request(
            '/api/search/nip/'.$nip.'/', ['date' => $this->date]
        );
        $subject_data = json_decode($response, true);
        if (isset($subject_data['code'])) {
            return new ErrorResponse($subject_data);
        }
        return new ResultSingle($subject_data['result']);
    }

    public function searchSubjectsByNips(string $nips): ResultEntries|ErrorResponse
    {
        $response = $this->_request(
            '/api/search/nips/'.$nips.'/', ['date' => $this->date]
        );
        $subject_data = json_decode($response, true);
        if (isset($subject_data['code'])) {
            return new ErrorResponse($subject_data);
        }
        return new ResultEntries($subject_data['result']);
    }

    public function searchSubjectsByBankAccount(string $bank_account): Result|ErrorResponse
    {
        $response = $this->_request(
            '/api/search/bank-account/'.$bank_account.'/', ['date' => $this->date]
        );
        $subject_data = json_decode($response, true);
        if (isset($subject_data['code'])) {
            return new ErrorResponse($subject_data);
        }
        return new ResultMulti($subject_data['result']);
    }

    public function searchSubjectsByBankAccounts(string $bank_accounts): Result|ResultEntries|ErrorResponse
    {
        $response = $this->_request(
            '/api/search/bank-accounts/'.$bank_accounts.'/', ['date' => $this->date]
        );
        $subject_data = json_decode($response, true);
        if (isset($subject_data['code'])) {
            return new ErrorResponse($subject_data);
        }
        return new ResultEntries($subject_data['result']);
    }

    public function checkSingleSubjectByNipAndBankAccounts(string $nip, string $bank_accounts): Result|ResultCheck|ErrorResponse
    {
        $response = $this->_request(
            '/api/check/nip/'.$nip.'/bank-account/'.$bank_accounts, ['date' => $this->date]
        );
        $subject_data = json_decode($response, true);
        if (isset($subject_data['code'])) {
            return new ErrorResponse($subject_data);
        }
        return new ResultCheck($subject_data['result']);
    }

    public function checkSingleSubjectByRegonAndBankAccounts(string $regon, string $bank_accounts): Result|ResultCheck|ErrorResponse
    {
        $response = $this->_request(
            '/api/check/regon/'.$regon.'/bank-account/'.$bank_accounts, ['date' => $this->date]
        );
        $subject_data = json_decode($response, true);
        if (isset($subject_data['code'])) {
            return new ErrorResponse($subject_data);
        }
        return new ResultCheck($subject_data['result']);
    }

    public function searchSingleSubjectByRegon(string $regon): Result|ResultSingle|ErrorResponse
    {
        $response = $this->_request(
            '/api/search/regon/'.$regon, ['date' => $this->date]
        );
        $subject_data = json_decode($response, true);
        if (isset($subject_data['code'])) {
            return new ErrorResponse($subject_data);
        }
        return new ResultSingle($subject_data['result']);
    }

    public function searchSubjectsByRegons(string $regons): Result|ResultEntries|ErrorResponse
    {
        $response = $this->_request(
            '/api/search/regons/'.$regons, ['date' => $this->date]
        );
        $subject_data = json_decode($response, true);
        if (isset($subject_data['code'])) {
            return new ErrorResponse($subject_data);
        }
        return new ResultEntries($subject_data['result']);
    }

    public function getDate(): bool|string
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }


    private function _request($path, $params): bool|string
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => self::API_DOMAIN.$path.'?'.http_build_query($params),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

}